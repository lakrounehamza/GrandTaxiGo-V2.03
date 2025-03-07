<form action="{{ route('payment.process') }}" method="POST" id="payment-form" class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-lg">
    @csrf
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Paiement sécurisé</h2>

    <label for="card-element" class="block text-gray-600 text-sm font-medium mb-2">Détails de la carte :</label>
    <div id="card-element" class="border border-gray-300 rounded-md p-3 shadow-sm bg-gray-50"></div>
    <div id="card-errors" role="alert" class="text-red-500 text-sm mt-2"></div>

    <button type="submit" id="submit-button" 
        class="w-full mt-4 bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-lg focus:ring-4 focus:ring-purple-300 disabled:opacity-50 disabled:cursor-not-allowed">
        Payer
    </button>
</form>

<script src="https://js.stripe.com/v3/"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var stripe = Stripe("{{ env('STRIPE_KEY') }}");
        var elements = stripe.elements();

        var style = {
            base: {
                fontSize: "16px",
                color: "#32325d",
                "::placeholder": { color: "#aab7c4" },
            },
            invalid: { color: "#fa755a" },
        };

        var card = elements.create("card", { style: style });
        card.mount("#card-element");

        var form = document.getElementById("payment-form");
        var submitButton = document.getElementById("submit-button");
        var cardErrors = document.getElementById("card-errors");

        form.addEventListener("submit", function (e) {
            e.preventDefault();
            submitButton.disabled = true;

            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    cardErrors.textContent = result.error.message;
                    console.error("Erreur Stripe:", result.error);
                    submitButton.disabled = false;
                } else {
                    var hiddenInput = document.createElement("input");
                    hiddenInput.setAttribute("type", "hidden");
                    hiddenInput.setAttribute("name", "stripeToken");
                    hiddenInput.setAttribute("value", result.token.id);
                    form.appendChild(hiddenInput);
                    form.submit();
                }
            });
        });
    });
</script>
