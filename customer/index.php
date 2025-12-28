<?php
include('header.php');
$obj = new dboperation();
$sql = "select * from tbl_category";
$result = $obj->executequery($sql);
?>

    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="index/img/hbg3.jpg" alt="Image" style="height:100vh; object-fit:cover">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Recycle Today, Live Brighter Tomorrow</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="index/img/bg2.jpg" alt="Image" style="height:100vh; object-fit:cover">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Recycle Today, Live Brighter Tomorrow</h1>
                                    <a href="#category" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Explore More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <section id="about">
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid bg-white w-100 mb-3 wow fadeIn" data-wow-delay="0.1s" src="index/img/a6.jpg" style="height: 375px;" alt="">
                                <img class="img-fluid bg-white w-50 wow fadeIn" data-wow-delay="0.2s" src="index/img/a7.jpg" style="height: 190px;" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid bg-white w-50 mb-3 wow fadeIn" data-wow-delay="0.3s" src="index/img/a3.jpg" style="height: 190px;" alt="">
                                <img class="img-fluid bg-white w-100 wow fadeIn" data-wow-delay="0.4s" src="index/img/a2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="section-title">
                            <p class="fs-5 fw-medium fst-italic text-primary">About Us</p>
                            <h1 class="display-6">The Remarkable Journey of UpcycleCart Over 5 Years</h1>
                        </div>
                        <div class="row g-3 mb-4">
                            <div class="col-sm-4">
                                <img class="img-fluid bg-white w-100" src="index/img/a1.jpg" alt="">
                            </div>
                            <div class="col-sm-8">
                                <h5>Celebrating 5 years of impact in recycling awareness</h5>
                                <p class="mb-0">Our initiative has consistently encouraged sustainable living through responsible recycling. Over the years, we have empowered communities to embrace eco-conscious habits.</p>
                            </div>
                        </div>
                        <div class="border-top mb-4"></div>
                        <div class="row g-3">
                            <div class="col-sm-8">
                                <h5>Leading the way in recycled product innovation and sales</h5>
                                <p class="mb-0">We take pride in offering high-quality goods crafted from recycled materials. Our store has become a trusted platform for promoting ethical, zero-waste consumer choices.</p>
                            </div>
                            <div class="col-sm-4">
                                <img class="img-fluid bg-white w-100" src="index/img/a4.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid product py-5" id="category">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Our Categories</p>
                <h1 class="display-6">Turn Your Waste into Value</h1>
            </div>
            <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($display = mysqli_fetch_array($result)) {
                ?>
                        <a href="customer_request.php?category_id=<?php echo $display["category_id"];?>" class="d-block product-item rounded">
                            <img src="../uploads/<?php echo $display["category_image"]; ?>" alt="<?php echo $display["category_name"]; ?>" style="width:100%; height:300px; object-fit:cover;">
                            <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                                <h4 class="text-primary"><?php echo $display["category_name"];?></h4>
                                <span class="text-body"><?php echo $display["category_description"];?></span>
                            </div>
                        </a>
                <?php
                    }
                } else {
                    echo "<p>No categories found.</p>";
                }
                ?>
            </div>
        </div>
    </div>

        <div class="container-fluid px-lg-5">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <p class="fs-5 fw-medium fst-italic text-success">What Our Users Say</p>
                <h1 class="display-6 fw-bold text-dark">Testimonials from Upcycle Cart Users</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card h-100 shadow-sm border-0 rounded-4 p-3">
                        <div class="text-center mb-3">
                            <img src="index/img/user4.png" alt="User 4" class="rounded-circle" style="width:150px; height:150px; object-fit:cover;">
                        </div>
                        <h5 class="text-success fw-bold text-center mb-2">Riya Sharma</h5>
                        <p class="text-muted text-center mb-3"><i class="fas fa-quote-left me-1 text-success"></i>Upcycle Cart provides top-notch recycled products. Their quality is outstanding and helps me live more sustainably.<i class="fas fa-quote-right ms-1 text-success"></i></p>
                        <div class="text-center">
                            <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star-half-alt text-warning"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="card h-100 shadow-sm border-0 rounded-4 p-3">
                        <div class="text-center mb-3">
                            <img src="index/img/user3.png" alt="User 3" class="rounded-circle" style="width:150px; height:150px; object-fit:cover;">
                        </div>
                        <h5 class="text-success fw-bold text-center mb-2">Arjun Menon</h5>
                        <p class="text-muted text-center mb-3"><i class="fas fa-quote-left me-1 text-success"></i>The service at Upcycle Cart is excellent. Pickup is smooth and timely, and it encourages everyone to contribute to a greener planet.<i class="fas fa-quote-right ms-1 text-success"></i></p>
                        <div class="text-center">
                            <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="card h-100 shadow-sm border-0 rounded-4 p-3">
                        <div class="text-center mb-3">
                            <img src="index/img/user2.png" alt="User 2" class="rounded-circle" style="width:150px; height:150px; object-fit:cover;">
                        </div>
                        <h5 class="text-success fw-bold text-center mb-2">Sneha Iyer</h5>
                        <p class="text-muted text-center mb-3"><i class="fas fa-quote-left me-1 text-success"></i>I love the range of recycled products they offer. Each item is high quality and using them makes me feel part of a sustainable community.<i class="fas fa-quote-right ms-1 text-success"></i></p>
                        <div class="text-center">
                            <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star-half-alt text-warning"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="card h-100 shadow-sm border-0 rounded-4 p-3">
                        <div class="text-center mb-3">
                            <img src="index/img/user1.png" alt="User 1" class="rounded-circle" style="width:150px; height:150px; object-fit:cover;">
                        </div>
                        <h5 class="text-success fw-bold text-center mb-2">Vikram Rao</h5>
                        <p class="text-muted text-center mb-3"><i class="fas fa-quote-left me-1 text-success"></i>Upcycle Cart has made recycling so easy and rewarding. Their platform encourages sustainable living in every household.<i class="fas fa-quote-right ms-1 text-success"></i></p>
                        <div class="text-center">
                            <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl contact py-5" id="contact">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Contact Us</p>
                <h1 class="display-6">Contact Us Right Now</h1>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8">
                    <p class="text-center mb-5">At UpcycleCart, we believe that sustainable change begins at the community level. Our platform is designed to help municipalities, residents, and item collectors work together toward a cleaner and greener environment.</p>
                    <div class="row g-5">
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-envelope fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">upcyclecart.thodupuzha@gmail.com</p>
                            <p class="mb-0">support.upcyclecart@gmail.com</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-phone fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">+91 75025 09667</p>
                            <p class="mb-0">+91 98765 43210</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                            </div>
                            <p class="mb-0">UpcycleCart Support Desk, Thodupuzha Municipality Office</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
$(document).ready(function(){
    $(".product-carousel").owlCarousel({
        loop: true,
        margin: 25,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: { items: 1 },
            768: { items: 2 },
            992: { items: 3 }
        }
    });
});
</script>

<style>
.product-item {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.product-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}
.owl-nav {
    position: absolute;
    top: -85px;
    right: 0;
}
.owl-nav .owl-prev, .owl-nav .owl-next {
    margin: 0 5px !important;
    width: 45px;
    height: 45px;
    display: inline-flex !important;
    align-items: center;
    justify-content: center;
    color: var(--primary) !important;
    background: #FFFFFF !important;
    border: 1px solid var(--primary) !important;
    border-radius: 45px;
    font-size: 20px !important;
    transition: .5s;
}
.owl-nav .owl-prev:hover, .owl-nav .owl-next:hover {
    background: var(--primary) !important;
    color: #FFFFFF !important;
}
</style>

<?php
include_once('footer.php');
?>