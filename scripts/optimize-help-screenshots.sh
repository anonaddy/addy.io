#!/usr/bin/env bash
# Losslessly compress PNG help screenshots under source/assets/img/help/.
# Run before committing new or updated screenshots:
#   npm run optimize:help-images
#   npm run optimize:help-images -- --list-only
#
# Requires one of (first found is used):
#   oxipng   (lossless)  —  cargo install oxipng  OR binary from GitHub releases
#   optipng  (lossless)  —  sudo apt install optipng   (Pop/Ubuntu)
#   pngquant (lossy)     —  sudo apt install pngquant  (Pop/Ubuntu universe)

set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
HELP_DIR="${ROOT}/source/assets/img/help"
MIN_KB=200
LIST_ONLY=false

for arg in "$@"; do
  case "$arg" in
    --list-only | -l) LIST_ONLY=true ;;
    -h | --help)
      echo "Usage: $(basename "$0") [--list-only]"
      echo ""
      echo "  (default)  Optimise all PNGs in source/assets/img/help/"
      echo "  --list-only  List PNG/JPEG files larger than ${MIN_KB} KB"
      exit 0
      ;;
  esac
done

if [[ ! -d "$HELP_DIR" ]]; then
  echo "error: help image directory not found: $HELP_DIR" >&2
  exit 1
fi

list_large() {
  find "$HELP_DIR" -type f \( -name '*.png' -o -name '*.jpg' -o -name '*.jpeg' \) -size +"${MIN_KB}"k -printf '%s\t%p\n' \
    | sort -rn \
    | awk -F'\t' -v root="$ROOT/" '{printf "%8.1f KB\t%s\n", $1/1024, substr($2, length(root)+1)}'
}

if $LIST_ONLY; then
  echo "Help screenshots over ${MIN_KB} KB:"
  echo ""
  if list_large | grep -q .; then
    list_large
    echo ""
    echo "$(list_large | wc -l) file(s)"
  else
    echo "  (none)"
  fi
  exit 0
fi

if ! command -v oxipng >/dev/null 2>&1 \
  && ! command -v optipng >/dev/null 2>&1 \
  && ! command -v pngquant >/dev/null 2>&1; then
  echo "error: install an image optimiser (oxipng is not in apt on Pop/Ubuntu)." >&2
  echo "  sudo apt install optipng    # lossless, recommended on Pop/Ubuntu" >&2
  echo "  sudo apt install pngquant   # lossy, high quality" >&2
  echo "  cargo install oxipng        # lossless, from crates.io" >&2
  exit 1
fi

shopt -s nullglob
png_files=("$HELP_DIR"/**/*.png)

if [[ ${#png_files[@]} -eq 0 ]]; then
  echo "No PNG files found under $HELP_DIR"
  exit 0
fi

before_kb=$(du -sk "$HELP_DIR" | awk '{print $1}')
echo "Optimising ${#png_files[@]} PNG file(s) in source/assets/img/help/ ..."

if command -v oxipng >/dev/null 2>&1; then
  echo "Using oxipng (lossless)"
  oxipng -o 4 --strip safe "${png_files[@]}"
elif command -v optipng >/dev/null 2>&1; then
  echo "Using optipng (lossless)"
  for f in "${png_files[@]}"; do
    optipng -quiet -o2 -strip all "$f"
  done
elif command -v pngquant >/dev/null 2>&1; then
  echo "Using pngquant (quality 85–95)"
  for f in "${png_files[@]}"; do
    pngquant --force --skip-if-larger --quality=85-95 --ext .png -- "$f"
  done
fi

after_kb=$(du -sk "$HELP_DIR" | awk '{print $1}')
saved_kb=$((before_kb - after_kb))

echo ""
echo "Done. Folder size: ${before_kb} KB → ${after_kb} KB (saved ${saved_kb} KB)"
echo ""
echo "Files still over ${MIN_KB} KB:"
list_large || echo "  (none)"
