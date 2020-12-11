<?php
require 'session/sessionConfig.php';
require 'view/header.php';
makeHeader('Home');

if(isset($_SESSION['permission'])){
    $permission = $_SESSION['permission'];
} else {
    $permission = '';
}

if(isset($_SESSION['logged_in'])){
    $loggedIn = true;
} else {
    $loggedIn = false;
}

echo "

<nav class='navbar fixed-top navbar-expand-md navbar-light bg-light'>
    <a class='navbar-brand' href='./index.php'>
        <img src='./images/avatar.png' class='myLogo' alt='myLogo'>
    </a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarCollapse' aria-haspopup='true' aria-expanded='false'>
        <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarCollapse'>
        <ul class='navbar-nav'>";

            if($loggedIn){
                echo "
                <li class='navbar-nav navItem'>
                    <a class='nav-link link' href='./menuPage.php'>Menu</a>
                </li>
                ";
            }

            // LINKS TO PRODUCT, CUSTOMER, AND TECHNICIAN MANAGEMENT PAGES
            if($permission === 'admin'){
                // PRODUCT MANAGEMENT
                echo "
                <li class='nav-item dropdown navItem'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Products
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        <a class='dropdown-item' href='./product_manager/index.php'>Manage Products</a>
                        <a class='dropdown-item' href='./product_manager/addProduct.php'>New Products</a>
                    </div>
                </li> ";
                // TECH MANAGMENT
                echo "
                <li class='nav-item dropdown navItem'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Technicians
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        <a class='dropdown-item' href='./technician_manager/index.php'>Manage Technicians</a>
                        <a class='dropdown-item' href='./technician_manager/newTech.php'>New Technician</a>
                    </div>
                </li>";
                // CUSTOMER MANAGEMENT
                echo "
                <li class='nav-item dropdown navItem'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Customers
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        <a class='dropdown-item' href='./customer_manager/index.php'>Manage Customer</a>
                        <a class='dropdown-item' href='./customer_manager/index.php'>New Customer</a>
                    </div>
                </li> ";
                // INCIDENT MANAGEMENT
                echo "
                <li class='nav-item dropdown navItem'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Incidents
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        <a class='dropdown-item' href='./create_incident/index.php'>Create Incident</a>
                        <a class='dropdown-item' href='./update_incident/index.php'>Assign Incident</a>
                    </div>
                </li>";
            }
            
            // REGISTER PRODUCT PAGE LINK FOR CUSTOMERS
            if($permission === 'customer'){
                echo "
                <li class='navbar-nav navItem'>
                    <a class='nav-link link' href='./register_product/index.php'>Register Product</a>
                </li>
                ";
            }

            // LINKS TO CREATE INCIDENTS AND VIEW INCIDENTS FOR TECHS
            if($permission === 'tech') {
                echo "
                <li class='navbar-nav navItem'>
                    <a class='nav-link link' href='./tech_incident/index.php'>My Incidents</a>
                </li>
                ";
            } 
            
        echo "
        </ul>
        "; 

if (isset($_SESSION['logged_in'])){

    $user = $_SESSION['user'];

    echo "
        <div class='nav-item dropdown ml-auto row top'>
            <a class='nav-link dropdown-toggle greenTextLink row' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <i class='fas fa-user top topReverse greenTextLink'></i>
                <p class='username topReverse'>$user</p>
            </a>
            <div class='dropdown-menu dropdown-menu-right top' aria-labelledby='navbarDropdownMenuLink'>
                <a class='dropdown-item redText' onclick='confirmLogout()'>Logout</a>
            </div>
        </div>
    ";
} else {

    echo "
        <div class='nav-item dropdown ml-auto'>
            <a class='nav-link dropdown-toggle greyTextLink' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <i class='fas fa-user top greyTextLink'></i>
            </a>
            <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownMenuLink'>
                <a class='dropdown-item greenText' href='userAuth/adminLoginPage.php'>Admin Login</a>
                <a class='dropdown-item greenText' href='userAuth/techLoginPage.php'>Tech Login</a>
                <a class='dropdown-item greenText' href='userAuth/customerLoginPage.php'>Customer Login</a>
            </div>
        </div>
    ";
}

echo "
    </div>
</nav>

";
?>
    <!-- PAGE TITLE -->
    <div class='pageTitleContainer'>
        <div class='pageTitle'>
            SportsPro
        </div>
        <div class='pageSubtitle'>
            Please Select your login type.
        </div>
    </div>

    <div class='homeButtonContainer'>
        <a href='userAuth/adminLoginPage.php' class='squishyButton'><i class="fas fa-book"></i>Admin</a>
        <a href='userAuth/techLoginPage.php' class='squishyButton' ><i class="fas fa-wrench"></i>Technician</a>
        <a href='userAuth/customerLoginPage.php' class='squishyButton'><i class="fas fa-user"></i>Customer</a>
    </div>


<footer class='footer'>
    <div class='footerCopyright'>
        &#169; SportPro Technologies 2020
    </div>
</footer>

<script>

    function deleteTech(){
        let deleteTech = confirm('Are you sure you want to delete technician?');

        if(deleteTech){
            window.location.href = 'delete.php?did=' + event.target.name;
        } else {
            alert('Technician not deleted.');
        }
    }

    function deleteProduct(){

        let deleteProduct = confirm('Are you sure you want to delete this product?');

        if(deleteProduct){
            window.location.href = 'delete.php?dProd=' + event.target.name;
        } else {
            alert('Product not deleted.');
        }
    }


    function confirmLogout(){
        let logout = confirm('Are you sure you want to logout?');

        if(logout){
            window.location.href = './userAuth/logout.php';
        } else {
            alert('You are still logged in!');
        }
    }

</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>