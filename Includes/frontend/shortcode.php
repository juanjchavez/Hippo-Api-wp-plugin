<?php
add_shortcode('HippoForm','hippoFormShortcode');
function hippoFormShortcode(){
    $nonce = wp_create_nonce("hippo_getquote_nonce");
    ob_start();
    
    ?>
    <section class="section is-style-wide column " id="hippo-main">
        <form action="#" class="">
            <div class="columns">
                <div class="column field">
                    <label for="" class="label">First Name*</label>
                    <div class="control">
                        <input type="text" id="firstName" class="input" placeholder="" required>
                    </div>
                </div>
                <div class="column field">
                    <label for="" class="label">Middle Name</label>
                    <div class="control">
                        <input type="text" id="middleName" class="input" placeholder="">
                    </div>
                </div>
                <div class="column field">
                    <label for="" class="label">Last Name*</label>
                    <div class="control">
                        <input type="text" id="lastName" class="input" placeholder="" required>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-two-thirds field">
                    <label for="" class="label">Street Address*</label>
                    <div class="control">
                        <input type="text" id="streetAddress" class="input" placeholder="" required>
                    </div>
                </div>
                <div class="column field">
                    <label for="" class="label">Unit #</label>
                    <div class="control">
                        <input type="text" id="unitNumber" class="input" placeholder="">
                    </div>
                </div>
            </div>
            <div class="columns">
            <div class="column field">
                    <label for="" class="label">City*</label>
                    <div class="control">
                        <input type="text" id="city" class="input" placeholder="" required>
                    </div>
                </div>
                <div class="column field">
                    <label for="" class="label">State*</label>
                    <div class="control select" >
                        <select name="" id="state" required>
                            <option value=""></option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky[D</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts[D</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania[D</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia[D</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                </div>
                <div class="column field">
                    <label for="" class="label">Zip Code*</label>
                    <div class="control">
                        <input type="text" id="zipCode" class="input" placeholder="" required>
                    </div>
                </div>
            </div>
            <div>
            <div class="columns">
                <div class="column field">
                    <label for="" class="label">Date of Birth*</label>
                    <div class="control">
                        <input type="text" id="birthday" class="input" placeholder="MM/DD/YYYY" required>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column field">
                    <label for="" class="label">Phone Number*</label>
                    <div class="control">
                        <input type="text" id="phoneNumber" class="input" placeholder="" required>
                    </div>
                </div>
                <div class="column field">
                    <label for="" class="label">Email Address*</label>
                    <div class="control">
                        <input type="text" id="email" class="input" placeholder="" required>
                    </div>
                </div>
            </div>
            <label for="" class="label">Is this a hose, condo or HO5?*</label>
            <div class="columns hippo-radio ">
                <div class="control column">
                    <label class="radio columns house is-mobile">
                        <div class="column hippo-image is-3"><img src="<?php echo plugin_dir_url( dirname( __DIR__ ),1).'Assets/img/House.jpg' ?>" alt=""></div>
                        <div class="column"> 
                            <span class="hippo-title">House</span>
                            <span class="hippo-body">This may be a single-family home, townhose or duplex you own and live in.</span>
                        </div>
                        <div class="column is-1 hippo-radio-button"><input type="radio" name="type" value="house"  required></div>
                    </label>
                </div>
                <div class="control column">
                    <label class="radio columns condo is-mobile">
                        <div class="column hippo-image is-3"><img src="<?php echo plugin_dir_url( dirname( __DIR__ ),1).'Assets/img/building.jpg' ?>" alt=""></div>
                        <div class="column"> 
                            <span class="hippo-title">Condo</span>
                            <span class="hippo-body">This is likely a multi-family building or complex in which you own a unit.</span>
                        </div>
                        <div class="column is-1 hippo-radio-button"><input type="radio" value="condo" name="type"></div>
                    </label>
                </div>
                <div class="control column">
                    <label class="radio columns ho5 is-mobile">
                        <div class="column hippo-image is-3"><img src="<?php echo plugin_dir_url( dirname( __DIR__ ),1).'Assets/img/ho5.jpg' ?>" alt=""></div>
                        <div class="column"> 
                            <span class="hippo-title">HO5</span>
                            <span class="hippo-body">The HO5 is an open perils insurance policy for a single-family home or duplex.</span>
                        </div>
                        <div class="column is-1 hippo-radio-button"><input type="radio" value="h05" name="type"></div>
                    </label>
                </div>

            </div>
            <div class="columns is-centered is-mobile">
                <button data-nonce="<?php echo $nonce ?>" data-target="<?php echo admin_url('admin-ajax.php') ?>" class="button column is-success is-rounded is-3 is-mobile hippo-submit">Submit</button>
            </div>
        </form>
    </section>


    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output ;
}

?>