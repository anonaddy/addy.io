#!/usr/bin/env bash
# Merge help articles in each source/_articles/<category>/ folder into one markdown
# file per category under merged_help_articles/ (e.g. blocklist.md).
#
# Articles are concatenated in `order` front-matter sequence (then by filename).
# No content editing; full file bodies are preserved.
#
# Usage (from repo root):
#   ./scripts/merge-help-articles.sh
#   npm run merge:help-articles

set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
ARTICLES_DIR="${ROOT}/source/_articles"
OUTPUT_DIR="${ROOT}/merged_help_articles"

mkdir -p "${OUTPUT_DIR}"

merge_category() {
  local category_dir="$1"
  local category
  category="$(basename "${category_dir}")"
  local output_file="${OUTPUT_DIR}/${category}.md"
  local -a sorted_files=()
  local line file order

  mapfile -t sorted_files < <(
    while IFS= read -r -d '' file; do
      order="$(grep -m1 '^order:' "${file}" 2>/dev/null | sed 's/^order:[[:space:]]*//' || true)"
      if [[ -z "${order}" ]] || ! [[ "${order}" =~ ^[0-9]+$ ]]; then
        order="9999"
      fi
      printf '%05d\t%s\n' "${order}" "${file}"
    done < <(find "${category_dir}" -maxdepth 1 -type f -name '*.md' -print0) | sort -t $'\t' -k1,1n -k2,2 | cut -f2-
  )

  if [[ ${#sorted_files[@]} -eq 0 ]]; then
    return 0
  fi

  : > "${output_file}"
  local first=true
  for file in "${sorted_files[@]}"; do
    if [[ "${first}" == true ]]; then
      cat "${file}" >> "${output_file}"
      first=false
    else
      printf '\n' >> "${output_file}"
      cat "${file}" >> "${output_file}"
    fi
  done

  echo "Wrote ${output_file} (${#sorted_files[@]} articles)"
}

if [[ ! -d "${ARTICLES_DIR}" ]]; then
  echo "Articles directory not found: ${ARTICLES_DIR}" >&2
  exit 1
fi

count=0
for category_dir in "${ARTICLES_DIR}"/*/; do
  [[ -d "${category_dir}" ]] || continue
  merge_category "${category_dir}"
  count=$((count + 1))
done

echo "Done. Merged ${count} categories into ${OUTPUT_DIR}/"
