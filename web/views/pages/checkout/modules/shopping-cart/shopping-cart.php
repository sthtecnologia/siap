 <!-- =====================================
Shopping Cart
====================================== -->

<section class="category-course-list-area mt-4 pt-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="user-dashboard-box mt-3">
                    <div class="p-4">
                        <h3 class="mb-4">Your cart items</h3>
                        
                        <!-- Cart Items Table -->
                        <div class="row border-bottom pb-3 mb-3">
                            <div class="col-md-6">
                                <strong>Items</strong>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong>Price</strong>
                            </div>
                        </div>

                        <div id="listCheckout">

                          <div class="jumbotron">
                            <h1 class="display-4">Ups!</h1>
                            <p class="lead">Aún no hay cursos agregados en esta sección</p>
                          </div>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Total Summary Sidebar -->
            <div class="col-lg-3">
                <div class="card shadow-sm mt-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="mb-4">Total</h5>
                            <h5 class="font-weight-bold totalPrice">$0</h5>
                        </div>

                        <?php if (!isset($_SESSION["student"])): ?>

                            <a href="/login" class="btn btn-primary btn-block btn-lg">
                                Continue to payment
                            </a>

                        <?php else: ?>

                        <form method="POST">

                            <input type="hidden" name="checkout_courses" value=''>

                            <button type="submit" class="btn btn-primary btn-block btn-lg" onclick="alertClick('Direccionando a la pasarela de pagos...')">
                                Continue to payment
                            </button>

                        </form>
                            
                        <?php endif ?>
                        <!-- Continue to Payment Button -->
                     
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 

        require_once "controllers/student.controller.php";
        $checkout = new StudentController();
        $checkout -> checkout();

    ?>



</section>