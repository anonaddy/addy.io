{{-- The DNS records from /help/adding-a-custom-domain/ --}}
<div class="art-frame art-pad" aria-hidden="true">
  <div class="dns-mock">
    <div class="dns-title"><span class="mono">example.com</span><span class="chip chip-ok">✓ Verified</span></div>
    <table class="dns">
      <tr><th>Type</th><th>Host</th><th>Value</th></tr>
      <tr><td>MX 10</td><td>@</td><td>mail.anonaddy.me.</td></tr>
      <tr><td>MX 20</td><td>@</td><td>mail2.anonaddy.me.</td></tr>
      <tr><td>TXT</td><td>@</td><td>v=spf1 include:spf.anonaddy.me -all</td></tr>
      <tr><td>CNAME</td><td>dk1._domainkey</td><td>dk1._domainkey.anonaddy.me.</td></tr>
    </table>
    <div class="dns-alias mono">anything@<span class="u">example.com</span></div>
  </div>
</div>
