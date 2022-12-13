<?php include("partials/nav.php"); ?>

<main class="main">
    <div class="container">

        <section class="intro animate-opacity" id="intro">
            <h2 class="intro__title">Enjoy Your Trip</h2>
            <p class="intro__text">
                Thank you for purchasing from EasyCoach Ltd.
            </p>

            <div class="intro__links">
                <a class="intro__links--btn" target="_blank" href="print.php?id=<?= $_GET['id'] ?? 0 ?>">Print</a>
                <a class="intro__links--btn" href="index.html">Home</a>
            </div>
        </section>

        <section class="info animate-opacity" id="info">
            <table class="info__table">
                <thead>
                    <tr>
                        <th colspan="2">Ticket Info</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Name</td>
                        <td class="have-id" id="name"></td>
                    </tr>
                    <tr>
                        <td>Tel No</td>
                        <td class="have-id" id="tel_no"></td>
                    </tr>
                    <tr>
                        <td>ID No</td>
                        <td class="have-id" id="id_no"></td>
                    </tr>
                    <tr>
                        <td>Route</td>
                        <td class="have-id" id="route"></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td class="have-id" id="date"></td>
                    </tr>
                    <tr>
                        <td>Seat Numbers</td>
                        <td class="have-id" id="seats"></td>
                    </tr>
                    <tr>
                        <td>Total Cost</td>
                        <td class="have-id" id="total-cost"></td>
                    </tr>
                </tbody>
            </table>
        </section>

    </div>
</main>

<script src="scripts/redirect.js"></script>