import sanitize from "/assets/js/utils/sanitizeInlineStyles.js";

export default class SubmitProcess {
    #route = "/wp-json/shops/v1/code/verify";
    constructor() {
        this.loader = document.querySelector(".loader");
    }

    onSubmit(e) {
        e.preventDefault();
        const code = this.input.value;
        if (!code) return;

        if (this.loader) this.loader.style.display = "block";

        this.button.disabled = true;

        this.#checkCode(sanitize(code));
    }

    #checkCode(code) {
        fetch(this.#route + `?codes=${code}`).then(async (response) => {
            if (response.ok) {
                const result = await response.json();

                if (result.status === true) {
                    this.showSuccess(result.message);

                    this.enableEverything();
                    return;
                } else {
                    this.showError(result.message);
                }
            } else {
                const { message } = await response.json();
                this.showError(message);
            }

            this.enableEverything();
        });
    }

    enableEverything() {
        if (this.loader) this.loader.style.display = "none";

        this.button.disabled = false;
    }
}
