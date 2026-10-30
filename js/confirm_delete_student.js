$(document).ready(function(){
    $(".deleteBtn").click(function(e){
        e.preventDefault();
        let id = $(this).data("id");

        let deleteConfirm = confirm("Are you sure you want to delete the id: " + id + "?");
        if (deleteConfirm){
            window.location.href="student_delete.php?id="+id;
        }
    })
})