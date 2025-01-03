<head>
	<meta charset="UTF-8">
    <title>Happy Nikah</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700;900&family=Noto+Sans+Malayalam:wght@400;500;600&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/easy-responsive-tabs.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>
<body>
    <section id="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="<?php echo site_url('user/home'); ?>">
                    <img src="<?php echo base_url() ?>assets/images/logoW.png" alt="Go to Nikah" width="auto" height="auto" class="gotoNikahlogo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarGoToNikah" aria-controls="navbarGoToNikah" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger" id="hamburger-1">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="navbarGoToNikah">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 mt-3 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo site_url('user/home'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/about'); ?>">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/download'); ?>">Download</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/contactus'); ?>">Contact</a>
                        </li>
                    </ul>
                    <ul class="d-flex logList align-items-center mb-3 mb-lg-0">
                        <li>Already Member</li>
                        <li>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                        </li>
                    </ul>
                  
                </div>
            </div>
        </nav>
    </section>