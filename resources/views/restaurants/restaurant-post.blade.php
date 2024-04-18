<div class="d-flex flex-column align-items-center rest-post-container">
    <h2>Reservation Form</h2>
    <form action="#" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="address" class="form-control" id="address" name="address" required>
        </div>

        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" class="form-control-file" id="photo" name="photo">
        </div>

        <div class="horizontal-select-container">
            <p class="select-tags-label">Select Tags:</p>
            <div class="select-options-container">
                <div class="select-container">
                    <select class="form-select" aria-label="Default select example" name="Location" >
                        <option selected disabled>Location</option>
                            <option value="Shinjuku">Shinjuku</option>
                            <option value="Yoyogi">Yoyogi</option>
                            <option value="Asakusa">Asakusa</option>
                            <option value="Tsukiji">Tsukiji</option>
                            <option value="Shibuya">Shibuya</option>
                            <option value="Ikebukuro">Ikebukuro</option>
                            <option value="Akihabara">Akihabara</option>
                            <option value="Harajuku">Harajuku</option>
                            <option value="Ginza">Ginza</option>
                            <option value="Ueno">Ueno</option>
                            <option value="Tokyo Station Area">Tokyo Station Area</option>
                            <option value="Roppongi">Roppongi</option>
                            <option value="Shinagawa">Shinagawa</option>
                            <option value="Akasaka">Akasaka</option>
                            <option value="Jiyugaoka">Jiyugaoka</option>
                            <option value="Ebisu">Ebisu</option>
                            <option value="Kichijoji">Kichijoji</option>
                            <option value="Nakano">Nakano</option>
                            <option value="Tsukishima">Tsukishima</option>
                            <option value="Odaiba">Odaiba</option>
                            <option value="Shimokitazawa">Shimokitazawa</option>
                    </select>
                </div>
                <div class="select-container">
                    <select class="form-select" aria-label="Default select example">
                        <option disabled selected>Variety</option>
                            <option value="Sushi">Sushi</option>
                            <option value="Tempura">Tempura</option>
                            <option value="Sukiyaki">Sukiyaki</option>
                            <option value="Shabu-shabu">Shabu-shabu</option>
                            <option value="Ramen">Ramen</option>
                            <option value="Okonomiyaki">Okonomiyaki</option>
                            <option value="Takoyaki">Takoyaki</option>
                            <option value="Japanese Wagyu">Japanese Wagyu</option>
                            <option value="Soba">Soba</option>
                            <option value="Udon">Udon</option>
                            <option value="Wagashi">Wagashi</option>
                            <option value="Yakitori">Yakitori</option>
                            <option value="Sashimi">Sashimi</option>
                            <option value="Osechi Ryori">Osechi Ryori</option>
                            <option value="Katsudon">Katsudon</option>
                    </select>
                </div>
                <div class="select-container">
                    <select class="form-select" aria-label="Default select example">
                        <option disabled selected>Religion</option>
                            <option value="Vegetarian">Vegetarian</option>
                            <option value="Vegan">Vegan</option>
                            <option value="Halal">Halal (Muslim-friendly)</option>
                    </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Accept CreditCards
                    </label>
                  </div>
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="experience">Share Your Experience:</label>
            <textarea class="form-control" id="experience" name="experience" rows="3"></textarea>
        </div>

        <!-- Add more fields as per your requirements -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>



