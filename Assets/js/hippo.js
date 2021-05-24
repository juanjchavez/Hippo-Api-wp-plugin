jQuery(document).ready( function() { 
    jQuery(".hippo-submit").click( function(e) {
        e.preventDefault();  
        if(hippoValidate() === true){
            hippoSendForm(jQuery(this), jQuery(this).attr("data-target"), jQuery(this).attr("data-nonce"));
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
    });
    let radio = jQuery('[name="type"]');
    jQuery.each(radio, (index, value) => {
        if(value.checked === true){
            type=true;
        }
    });
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
};

const hippoFormClear = () => {
    textInputs = jQuery('input[type="text"], .select select');
    jQuery.each(textInputs, (index, value) => {
        value.value="";
    });
    radioInputs = jQuery('input[type="radio"]');
    jQuery.each(radioInputs, (index, value) => {
        value.checked=false;
    });
};

const hippoSendForm = (el, target, formNonce) => {
    jQuery(el).addClass('is-loading');
    const birthday = document.querySelector("#birthday").value;
    data = {
        street: encodeURIComponent(document.querySelector("#streetAddress").value),
        city: encodeURIComponent(document.querySelector("#city").value),
        state: encodeURIComponent(document.querySelector("#state").value),
        zip: encodeURIComponent(document.querySelector("#zipCode").value),
        first_name: encodeURIComponent(document.querySelector("#firstName").value),
        last_name: encodeURIComponent(document.querySelector("#lastName").value),
        email: encodeURIComponent(document.querySelector("#email").value),
        phone: encodeURIComponent(document.querySelector("#phoneNumber").value),
        date_of_birth: birthday.replace("/","").replace("/",""),
    };
    const arguments = `street=${data.street}&city=${data.city}&state=${data.state}&zip=${data.zip}&first_name=${data.first_name}&last_name=${data.last_name}&email=${data.email}&phone=${data.phone}&date_of_birth=${data.date_of_birth}`;


    jQuery.ajax({
        type : "post",
        dataType : "json",
        url : target,
        data : {action: "hippo_getquote", nonce: formNonce, args:arguments }
    }).done(function(response) {
        jQuery(el).removeClass('is-loading');

        console.log(response);
        if(response.success === false) {
            Swal.fire({
                title: 'Oops! Something went wrong',
                text: response.errors[0].message,
                icon: 'error'
            });
        }
        else {
            Swal.fire({
                title: 'Done!',
                text: `Your quote is for $${response.quote_premium}`,
                icon: 'success'
            });
            hippoFormClear();
        }
    });
    //console.log(data);
    
};