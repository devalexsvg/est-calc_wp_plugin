<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Report</title>
    <link rel="stylesheet" type="text/css" href="<?php echo plugin_dir_url(__DIR__); ?>assets/css/style.css">
</head>
<body>
<div class="page">
    <div class="container container__page-1">
        <header class="report-header report-header__page-1">
            <div class="report-header__logo">
                <div class="logo-img-wr">
                    <img src="<?php echo plugin_dir_url(__DIR__); ?>assets/img/logo-new.png" alt="">
                </div>
                <h1>Company name</h1>
            </div>
            <h2>Skilled developers recruited <br> exclusively for you</h2>
            <div class="yellow-tr"></div>
        </header>
        <div class="content content__page-1">
            <h2>YOUR PRELIMINARY ESTIMATION FOR REMOTE DEDICATED TEAM SET UP</h2>
            <p>Company name hires the best tech experts for dedicated teams and organizes workspace for them in Ukraine. We undertake all administrative issues and help our clients to manage their software development</p>
        </div>
        <footer class="report-footer report-footer__page-1">
            <p>If you have any questions, do not hesitate to contact us.</p>
            <p>mail to: info@qubit-labs.com</p>
            <p class="contacts">
                Company name <br>
                Kyiv, Ukraine <br>
                2018
            </p>
        </footer>
    </div>
</div>
<div class="page page-2">
    <div class="container">
        <div class="content">
            <h3 class="page-title" >YOUR APPROXIMATE BUDGET</h3>
            <table cellpadding="10" class="estimate-calc">
                <tr class="t-header">
                    <td>SALARY PER PERSON</td>
                    <td>TEAM SIZE</td>
                    <td>Company name COMMISION PER PERSON</td>
                    <td>6% INCOME TAX</td>
                    <td>TOTAL MONTHLY PRICE <br><span>* Without discount</span></td>
                </tr>
                <tr>
                    <td><span class="currency"><?=$currencySymbol;?></span> <?=$budget;?></td>
                    <td><?=$devs;?></td>
                    <td><span class="currency"><?=$currencySymbol;?></span> <?=$comissionPerPerson;?></td>
                    <td><span class="currency"><?=$currencySymbol;?></span> <?=$tax?></td>
                    <td><span class="currency"><?=$currencySymbol;?></span> <?=$total?></td>
                </tr>
            </table>
            <h3>HOW CAN I APPLY FOR A <span style="color:#ffc400">SPECIAL DISCOUNT</span></h3>
            <p>- Your are a Startup <br>
                - You need 5 or more team members <br>
                - You are "Women in Tech" organization member
            </p>
            <p><strong>Contact us to get more details about discount programs for our clients!</strong></p>
            <div class="text-center wrap_btn">
                <div>
                    <a class="btn" href="link_to_call">SCHEDULE A CALL</a>
                </div>
            </div>
            <h3>MONTHLY BUDGET STRUCTURE:</h3>
            <div class="row">
                <div class="col-5">
                    <ul>
                        <li>Engineers Salaries and Rewards</li>
                        <li>Company name Service Fee</li>
                        <li>Income Tax</li>
                    </ul>
                </div>
            </div>
            <h3>WHAT IS INCLUDED IN SERVICE?</h3>
            <p>Company name will provide you with the best facilities and services</p>
            <div class="row">
                <div class="col-5">
                    <ul>
                        <li>HR & recruiting</li>
                        <li>Legal support</li>
                        <li>Employee onboarding</li>
                        <li>Health insurance</li>
                        <li>Guest workplace for client</li>
                        <li>HR management automatization</li>
                        <!-- <li>Shape communication flows</li> -->
                        <!-- <li>Performance reviews</li> -->
                    </ul>
                </div>
                <div class="col-5">
                    <ul>
                        <li>Employee retention</li>
                        <li>Office facilities</li>
                        <li>Employee perks and benefits</li>
                        <li>Payroll processing</li>
                        <!-- <li>Social security payments</li> -->
                        <li>Trial period</li>
                    </ul>
                </div>
            </div>
        </div>
        <footer class="report-footer report-footer__page-2">
        </footer>
    </div>
</div>
<div class="page">
    <div class="container">
        <div class="content">
            <h2 class="text-center page-title">OUR PROCESS</h2>
            <div class="steps">
                <div class="row">
                    <div class="col-3 text-center">
                        <div><img src="<?php echo plugin_dir_url(__DIR__); ?>assets/img/1.jpg" alt=""></div>
                        <h4 class="uppercase">Send requirements</h4>
                        <p>Tell us more about the software engineers you need.</p>
                    </div>
                    <div class="col-1">
                      1 - 2 weeks
                    </div>
                    <div class="col-3 text-center">
                        <div><img src="<?php echo plugin_dir_url(__DIR__); ?>assets/img/2.jpg" alt=""></div>
                        <h4 class="uppercase">Evaluation of candidates</h4>
                        <p>Interview your new team to make sure they are a good fit.</p>
                    </div>
                    <div class="col-1">
                      2 - 4 weeks
                    </div>
                    <div class="col-3 text-center">
                        <div><img src="<?php echo plugin_dir_url(__DIR__); ?>assets/img/3.jpg" alt=""></div>
                        <h4 class="uppercase">Get to work</h4>
                        <p>Manage your team using your preferred tools.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="colored-content">
            <div class="row">
                <div class="col-6 colored-black">
                    <h4 class="uppercase">Keep All Knowledge In-house</h4>
                    <p>Our custom software developers easily integrate into your in-house team and become your remote full-time employees. They work solely on your project dedicating 100% of their working hours to your tasks.</p>
                </div>
                <div class="col-6 colored-green">
                    <h4 class="uppercase">Retain Control at Every Stage</h4>
                    <p>Productivity and flexibility mean a lot to us, these are two key principles of our model. We grant you freedom of choice - you will be able to use the tools you like to manage your software development team and communicate with it easily.</p>
                </div>
            </div>
        </div> -->
        <!-- <div class="earth">
            <div class="content">
                <h3>Reasons to Hire Ukrainian Software Developers</h3>
                <div class="row">
                    <div class="col-6">
                        <p><span class="important">80%</span> of software engineers in Ukraine speak English</p>
                        <p>Proximity to <span class="important">Western European</span> and <span class="important">US markets</span></p>
                        <p><span class="important">1st</span> largest outsourcing market in Eastern Europe</p>
                    </div>
                    <div class="col-4">
                        <p><span class="important">5th</span> in Top Coder Rating</p>
                        <p><span class="important">88,7</span> HackerRank Score</p>
                        <p><span class="important">36,000</span> new tech graduates annually</p>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="text-center ready_disc">
            <h4>Ready to discuss?</h4>
            <p><strong>To know more about discounts, developers salaries and our terms</strong> contact us at info@qubit-labs.com or </p>
            <div>
                <a class="btn" href="https://qubit-labs.com/schedule-call/?utm_source=report&utm_medium=call2">SCHEDULE A CALL</a>
            </div>
        </div>
        <footer class="report-footer report-footer__page-4">
            <div class="content">
                <div class="row">
                    <div class="col-6">
                        <div>
                            <img src="<?php echo plugin_dir_url(__DIR__); ?>assets/img/logo-text-black.jpg" alt="">
                        </div>
                        <h4>Hire trusted developers</h4>
                    </div>
                    <div class="col-6 text-right">
                        <p>Contacts</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>
</html>
