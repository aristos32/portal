<script type="module" src="https://service.image-tech-storage.com/workers/webcomponents.f9fc6732.js"></script>

<script>
    console.log('skillonnet.blade.php');

    console.log('fetching tournaments...');
    fetch('https://service.safe-communication.com/tournaments?skin=DrueckGlueck&lang=de').then(response => {
        console.log('tournaments response:', response);
        return response.json();
    }).then(json => {
        console.log('tournaments data:', json);
    }).catch(err => {
        console.error('tournaments Fetch problem: ' + err.message);
    });

    console.log('fetching jackpots...');
    fetch(`https://service.safe-communication.com/jackpots?skin=DrueckGlueck&limit=1`)
    .then(response => {
        console.log('jackpots response:', response);
        return response.json();
    })
    .then(data => {
        console.log('jackpots data:', data);
    })
    .catch(error => console.error('jackpots Error:', error));

    console.log('fetching winners...');
    fetch(`https://service.safe-communication.com/winners?skin=DrueckGlueck&limit=10`)
    .then(response => {
        console.log('winners response:', response);
        return response.json();
    })
    .then(data => {
        console.log('winners data:', data);
    })
    .catch(error => console.error('winners Error:', error));

</script>


<son-faq></son-faq>

<iframe style="margin:0;padding:0;border:none;" scrolling="no" allowfullscreen="" src="https://promos.safe-communication.com/funmode.php?appName=DrueckGlueck&langID=en&gameID=9043"></iframe>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
aristos works

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<a href="#" onclick="downloadMobileApp()">Download Android App</a>

<script>
    function downloadMobileApp() {
        const family = "DrueckGlueck";
        window.open(`https://son-mobile-new-casino.s3-eu-west-1.amazonaws.com/apk_archive/standalone/latest/app-${family.toLowerCase()}-release.apk`, '_blank');
        return false;
    }
</script>