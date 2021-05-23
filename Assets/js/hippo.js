jQuery(document).ready( function() { 
    jQuery(".hippo-submit").click( function(e) {
        e.preventDefault();  
        if(hippoValidate() === true){
            alert("validated");
        }
    })
});

const hippoValidate = () =>{
    let result = true;
    let type=false;
    let toValidate = jQuery('[required]');
    jQuery.each(toValidate, (index, value) =>{
        let parent=value.parentNode;
        let span = parent.querySelector('.hippo-danger');
        if(span != null){
            span.remove();
        }
        if((value.type==="text" || value.localName === "select") && value.value === ""){
            let span = document.createElement('span');
            span.innerHTML ="*This field is required";
            span.classList.add("hippo-danger");
            let parent=value.parentNode;
            parent.appendChild(span);
            result = false;
        }
        //console.log(value);
        //console.log(value);
    });
    let radio = jQuery('[name="type"]');
    console.log(radio);
    jQuery.each(radio, (index, value) => {
        console.log(value);
        if(value.checked === true){
            type=true;
        }
    });
    console.log(type);

    let el=document.querySelector('.hippo-radio');
    let span = el.querySelector('.control').querySelector('.hippo-danger');
    if(span != null){
        span.remove();
    }
    if (type===false){
        let span = document.createElement('span');
        span.innerHTML ="*Please choose an option";
        span.classList.add("hippo-danger");
        el.querySelector('.control').appendChild(span);
        result = false;
    }
    if (result === false){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please fill all required fields'
        });
    }
    return result
}