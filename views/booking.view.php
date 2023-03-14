<?php require base_path("views/partials/nav.php"); ?>

<head>
    <link rel="stylesheet" href="../css/booking.css">
</head>

<main class="main">
    <div class="container">

        <form action="/booking/store" method="POST">
            <section class="book">
                <p class="book__form--title" id="passenger-details">Passenger Details</p>
                <div class="book__form--container">
                    <div class="book__form--box">
                        <input type="text" name="fname" id="fname" class="book__form--input" placeholder=" ">
                        <label for="fname" class="book__form--label">First Name</label>
                    </div>
                    <div class="book__form--box">
                        <input type="text" name="lname" id="lname" placeholder=" " class="book__form--input">
                        <label for="lname" class="book__form--label">Last Name</label>
                    </div>
                    <div class="book__form--box">
                        <input type="number" name="tel-no" id="tel-no" placeholder=" " class="book__form--input">
                        <label for="tel-no" class="book__form--label">Telephone No</label>
                    </div>
                    <div class="book__form--box">
                        <input type="number" name="id-no" id="id-no" placeholder=" " class="book__form--input">
                        <label for="id-no" class="book__form--label">ID Number</label>
                    </div>
                </div>

                <p class="book__form--title">Ticket Details</p>
                <div class="book__form--container">
                    <div class="book__form--box">
                        <select name="route" id="route" class="book__form--input">
                            <?php if (isset($routes)) {
                                foreach ($routes as $row) { ?>
                                    <option value="<?= $row['route_id'] ?>"><?php echo $row['departure'] . " - " . $row['destination'] ?></option>
                            <?php }
                            } ?>
                        </select>
                        <label for="route" class="book__form--label">Route</label>
                    </div>
                    <div class="book__form--box">
                        <input type="number" name="cost" id="cost" class="book__form--input" readonly>
                        <label for="cost" class="book__form--label">Cost</label>
                    </div>
                    <div class="book__form--box">
                        <input type="date" name="dep-date" id="dep-date" class="book__form--input">
                        <label for="dep-date" class="book__form--label">Departure Date</label>
                    </div>
                </div>
            </section>

            <div class="book__form--col">
                <p class="book__form--title">Choose Seats</p>
                <button id="myBtn" class="book__form--col__btn"><img src="img/help-32.png" alt="help icon"></button>
            </div>

            <section class="tables">
                <section class="tables__col">
                    <table id="seatsDiagram">
                        <tr>
                            <td id="seat-1">1</td>
                            <td id="seat-2">2</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-3">3</td>
                            <td id="seat-4">4</td>
                        </tr>
                        <tr>
                            <td id="seat-5">5</td>
                            <td id="seat-6">6</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-7">7</td>
                            <td id="seat-8">8</td>
                        </tr>
                        <tr>
                            <td id="seat-9">9</td>
                            <td id="seat-10">10</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-11">11</td>
                            <td id="seat-12">12</td>
                        </tr>
                        <tr>
                            <td id="seat-13">13</td>
                            <td id="seat-14">14</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-15">15</td>
                            <td id="seat-16">16</td>
                        </tr>
                        <tr>
                            <td id="seat-17">17</td>
                            <td id="seat-18">18</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-19">19</td>
                            <td id="seat-20">20</td>
                        </tr>
                        <tr>
                            <td id="seat-21">21</td>
                            <td id="seat-22">22</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-23">23</td>
                            <td id="seat-24">24</td>
                        </tr>
                        <tr>
                            <td id="seat-25">25</td>
                            <td id="seat-26">26</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-27">27</td>
                            <td id="seat-28">28</td>
                        </tr>
                        <tr>
                            <td id="seat-29">29</td>
                            <td id="seat-30">30</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-31">31</td>
                            <td id="seat-32">32</td>
                        </tr>
                        <tr>
                            <td id="seat-33">33</td>
                            <td id="seat-34">34</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-35">35</td>
                            <td id="seat-36">36</td>
                        </tr>
                        <tr>
                            <td id="seat-37">37</td>
                            <td id="seat-38">38</td>
                            <td class="space">&nbsp;</td>
                            <td id="seat-39">39</td>
                            <td id="seat-40">40</td>
                        </tr>
                        <tr>
                            <td id="seat-41">41</td>
                            <td id="seat-42">42</td>
                            <td id="seat-43">43</td>
                            <td id="seat-44">44</td>
                            <td id="seat-45">45</td>
                        </tr>
                    </table>
                </section>

                <section id="selectedSeats" class="selected tables__col">
                    <p class="selected__title">
                    </p>
                    <table class="selected__table animate-opacity">
                        <thead>
                            <tr>
                                <th>Seat</th>
                                <th>Fare</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody id="chosenSeats">
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Total</td>
                                <td colspan="2" id="seatCost"></td>
                            </tr>
                        </tfoot>
                    </table>
                </section>
            </section>

            <button style="margin-bottom: 1rem;" class="book__btn" type="button" name="book-ticket" id="book-ticket">Proceed</button>
            <input hidden type="text" id="seats" name="seats[]">
        </form>
    </div>
</main>

<div class="error__msg" id="error-msg">
    <div class="error__msg--text"></div>
</div>


<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal__content">
        <div class="modal__header">
            <span class="modal__header--close">&times;</span>
            <h2>Help</h2>
        </div>
        <div class="modal__body">
            <p class="modal__body--text">Explanations of the Coloring of Seats:</p>

            <div class="modal__body--col">
                <p class="notAvailable">1</p>
                <span> => Seat is Already Booked</span>
            </div>
            <div class="modal__body--col">
                <p class="selected">2</p>
                <span> => Seat is Selected</span>
            </div>

            <br>

            <p class="modal__body--text">
                <span class="modal__body--span">Note: </span>
                Changing the Route or Departure Date refreshes the Seats and Tickets-Chosen Tables
            </p>

        </div>
    </div>

</div>

<script src="../scripts/booking.js" defer></script>
<?php require base_path("views/partials/footer.php"); ?>