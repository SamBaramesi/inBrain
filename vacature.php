<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/theme.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.4/index.global.js" integrity="sha512-ccW0fIqkqsuQqHQhWDqLenaKdZJ1AI4vJ8Vu5o189JEDVmxvjydK5UznN2625++QDeG8EY7a0IPJKP1NRvC68A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <title>Werken Bij!</title>
</head>

<body>
    <!-- Nav Section -->
    <nav id="nav"></nav>
    <!-- Banner Section -->
    <section id="banner" class="banner"><div id="Bcontent"><span id="banJSON"></span></div></section>

    <div class="content">

        <!-- Summery Section -->
        <section id="summery" class="colFloat" style="padding: 30px 30px;"><div class="column column-1"><h3>Wat is vereist?</h3><br><ul id="colOneJSON" class="p2 less-spacing fa-ul"></ul></div><div class="column column-1"><h3>Wat krijg je?</h3><br><ul id="colTwoJSON" class="p2 less-spacing fa-ul"></ul></div><div class="column column-2"><h3>Wat doe je?</h3><br><ul><li><canvas id="myChart"></canvas></li></ul></div></section>

        <!-- Contact Section -->
        <section id="contact" style="padding: 30px 30px;"><div class="contact"></div></section>

        <!-- Vacancy Section -->
        <section id="vacancy" style="padding: 30px 30px;"></section>

        <!-- Calendar Section -->
        <section id="calendar" class="workWeek" style="background-color: #e8e8e8; padding: 30px 30px; display:inline-block;"></section>

        <!-- practicalExample Section -->
        <section id="practicalExample" style="padding: 30px 30px; margin-top: 10vh; display: inline-block;"></section>

        <!-- careerGrowth Section -->
        <section><div id="careerGrowth" style="padding: 30px 30px;"></div></section>

        <!-- Video Section -->
        <section id="video" style="padding: 30px 30px;"></section>

        <!-- Work With Us Section -->
        <section id="workWithUs" style="padding: 30px 30px;"></section>
        
    </div>
    <script src="assets/scripts/objects/navBar.js"></script>
    <script src="assets/scripts/objects/banner.js"></script>
    <script src="assets/scripts/objects/summery.js"></script>
    <script src="assets/scripts/pie-chart.js"></script>
    <script src="assets/scripts/objects/contact.js"></script>
    <script src="assets/scripts/objects/vacancy.js"></script>
    <script src="assets/scripts/calendar.js"></script>
    <script src="assets/scripts/objects/practicalExample.js"></script>
    <script src="assets/scripts/objects/careerGrowth.js"></script>
    <script src="assets/scripts/objects/video.js"></script>
    <script src="assets/scripts/objects/workWithUs.js"></script>
    <script src="assets/scripts/objects/data.js"></script>
    <script src="assets/scripts/functions.js"></script>
    
</body>

</html>