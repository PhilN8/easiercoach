<?php require base_path("views/partials/nav.php"); ?>

<head>
    <link rel="stylesheet" href="../css/services.css">
</head>


<main class="main container">
    <section class="intro">
        <h1 class="intro__title">
            Courier Services
        </h1>

        <p class="intro__text">
            At our Letters and Parcels Courier Services Division,
            we courier <span>medium-sized parcels</span>, <span>letters</span> and <span>documents</span> to each of the over 30 branches where we have a presence.
            We take utmost care in ensuring that our customer’s letters and parcels reach the intended destinations in time,
            secure and in good condition.
            We package the letters and parcels in security tamper proof bags while on transit.
            Our delivery time for all letters and parcels is same day and/or within 24 hours.
        </p>
    </section>

    <div class="flex">
        <section class="parcels">
            <table class="parcels__table">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Cost in Kshs.</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Small envelopes</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>Big envelopes with documents</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>Kampala letters</td>
                        <td>400</td>
                    </tr>
                </tbody>
            </table>

            <table class="cost__table">
                <thead>
                    <tr>
                        <th>Weight</th>
                        <th>Cost in Kshs.</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1 - 7kg</td>
                        <td>250</td>
                    </tr>
                    <tr>
                        <td>8 - 10kg</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>11 - 15kg</td>
                        <td>350</td>
                    </tr>
                    <tr>
                        <td>16 - 19kg</td>
                        <td>400</td>
                    </tr>
                    <tr>
                        <td>20 - 25kg</td>
                        <td>500</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="help">
            <h2 class="help__title">Need Assistance?</h2>
            <p class="help__text">
                Contact The Courier Services Division by calling:
                <span>+254 788545402</span>, <span>+254 738200156</span> or <span>+254 738200302.</span>
                <br>
                You can also get assistance from any of the contact numbers of the branch
                near your location.
            </p>
        </section>

    </div>

    <section class="terms">
        <h2 class="terms__title">Terms and Conditions</h2>
        <ol class="terms__list">
            <li class="terms__item">All fragile and breakable items shall only be accepted if the customer will sign the Breakage on Owners' Risk (B.O.R) document.</li>
            <li class="terms__item">We do NOT send money or valuables e.g. jewellery and phones.</li>
            <li class="terms__item">We store goods for only one month. Non-collected items shall be DISPOSED without further notice after the expiry period.</li>
            <li class="terms__item">We do NOT send these items:-</li>
        </ol>

        <ul class="terms__list--secondary">
            <li class="terms__list--secondary__item">Acid Batteries</li>
            <li class="terms__list--secondary__item">Fragile Items</li>
            <li class="terms__list--secondary__item">Pointed Metals and Iron Sheets</li>
            <li class="terms__list--secondary__item">Poisonous drugs, pesticide and fertilizers</li>
            <li class="terms__list--secondary__item">Inflammable or Explosive Items</li>
            <li class="terms__list--secondary__item">Any form of Liquid</li>
        </ul>
    </section>
</main>

<?php require base_path("views/partials/footer.php"); ?>