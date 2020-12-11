
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
            window.location.href = '../tech_support/userAuth/logout.php';
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