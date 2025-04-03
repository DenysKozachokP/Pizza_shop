<div class="cookie-popup fixed-bottom bg-dark text-white p-3" style="display: none;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <p class="mb-0">We use cookies to ensure you get the best experience on our website. 
                <a href="/site/privacy" class="text-white">Learn more</a></p>
            </div>
            <div class="col-md-4 text-end">
                <button class="btn btn-outline-light me-2" id="cookie-reject">Reject</button>
                <button class="btn btn-primary" id="cookie-accept">Accept</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Check if cookie consent was already given
    if (!document.cookie.includes('cookie_consent=true')) {
        document.querySelector('.cookie-popup').style.display = 'block';
    }

    // Handle accept button
    document.getElementById('cookie-accept').addEventListener('click', function() {
        // Set cookie for 1 year
        const date = new Date();
        date.setFullYear(date.getFullYear() + 1);
        document.cookie = `cookie_consent=true; expires=${date.toUTCString()}; path=/`;
        document.querySelector('.cookie-popup').style.display = 'none';
    });

    // Handle reject button
    document.getElementById('cookie-reject').addEventListener('click', function() {
        // Set cookie for session only
        document.cookie = 'cookie_consent=false; path=/';
        document.querySelector('.cookie-popup').style.display = 'none';
    });
});
</script>