<? //Inspired by: https://medium.com/@jmperezperez/displaying-page-load-metrics-on-your-site-2e13f63164eb ?>

<script>
window.addEventListener('load', () =>
{
  setTimeout(() =>
  {
    const timing = window.performance && performance.timing
    const round2 = num => Math.round(num * 100) / 100

    if (timing)
    {
        const elm  = document.querySelector('#timing')
        const time = round2((timing.loadEventEnd - timing.navigationStart) / 1000)
        elm.innerHTML = time;
    }

  }, 0)
})
</script>

<p class="white-100 fw-30 fs-14 lh-16 mb-20 mt-30">Loaded in <span id="timing"></span>s</p>
