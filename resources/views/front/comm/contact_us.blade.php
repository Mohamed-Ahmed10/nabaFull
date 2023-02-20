<div class="contact-from-section mt-5 mb-5" id="join">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div class="form-title">
                    <h2>You want to join this</h2>
                    <p>You can join out community and we will contact you</p>
                </div>
                <div id="form_status"></div>
                <div class="contact-form">
                    <form role="form" action="{{url(route('front/contact-us'))}}" method="post">
                        @csrf
                        <div class="m-3">
                            <input type="text" placeholder="Name" name="name" id="name" required>
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="text" placeholder="Company name" name="company_name" id="company_name"	required>
                            @error('company_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="email" placeholder="Email" name="email" id="email" required>
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="m-3">
                            <select name="country" id="" required>
                                <option disabled selected hidden style="color:#DDD">Select your country</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Egypt">Egypt</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Oman">Oman</option>
                                <option value="UAE">UAE</option>
                                <option value="Libya">Libya</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Algeria">Algeria</option>
                                <option value="Somalia">Somalia</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Syrian">Syrian</option>
                                <option value="Palestine">Palestine</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Other - Record the international phone number">Other - Record the international phone number</option>
                            </select>
                            @error('country')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="tel" placeholder="Mobile number" name="phone" id="phone" required>
                            @error('phone')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="m-3">
                            <textarea name="notes" id="" cols="30" rows="10" placeholder="Enter your message"></textarea>
                            @error('notes')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div> 
                        <div class="m-3">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                        </div> 
                        <div class="m-3">
                            <input type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>