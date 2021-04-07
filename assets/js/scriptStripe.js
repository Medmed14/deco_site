$(function(){ 

    
    const stripe = Stripe("pk_test_51Id9HFAFJJA1I8csVN4xyNf9fxbEHQD6q3L3AdJYA8tNi3RC0JaiYaaGGvdNgA3DlCrmF8QvWugW4tvh0buPvCaC00CkbSnLpK");

    
    const checkoutButton = $('#checkout-button');
    checkoutButton.on('click',function(e){
        // console.log($('#email').val()); //c'etait pour tester le click et la recup email
        e.preventDefault();
        console.log($('#nb').val());

        $.ajax({
            url:'index.php?action=pay',
            method:'post',
            data:{
                id: $('#ref').val(),
                marque: $('#marque').val(),
                intitule: $('#intitule').val(),
                prix: $('#prix').val(),
                email: $('#email').val(),
                quantite: $('#quantite').val(),
                nb: $('#nb').val() //on recupere et on envoie vers le serveur
            },
            datatype:'json',
            
            success:function(session){
                console.log(session);
                return stripe.redirectToCheckout({ sessionId: session.id});
            },
            error: function(){
                console.error("fail to send!");
            }
        })
    })
});