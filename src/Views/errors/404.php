<style>
    * {
        font-size: 25px;
        text-align: center;
    }
    .error-title {
        font-size: 50px;
        color: black;
    }
    .errors-wrapper {
        color: red;
    }
    .pre-message-error {
        font-style: italic;
        font-size: 20px;
    }
</style>

<h3 class="error-title">{{ title }}</h3>

<div class="errors-wrapper">
    <span>Oops something went wrong, <pre class="pre-message-error">{{ message }}</pre> please try again.</span>
</div>