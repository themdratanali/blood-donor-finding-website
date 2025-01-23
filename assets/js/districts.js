function loadDistricts(divisionId) {
    let districtSelect = '<option value="">জেলা নির্বাচন করুন</option>';

    if (divisionId === "Dhaka") { // Dhaka
        districtSelect += '<option value="Dhaka">ঢাকা</option>';
        districtSelect += '<option value="Faridpur">ফরিদপুর</option>';
        districtSelect += '<option value="Gazipur">গাজীপুর</option>';
        districtSelect += '<option value="Gopalganj">গোপালগঞ্জ</option>';
        districtSelect += '<option value="Kishoreganj">কিশোরগঞ্জ</option>';
        districtSelect += '<option value="Madaripur">মাদারিপুর</option>';
        districtSelect += '<option value="Manikganj">মানিকগঞ্জ</option>';
        districtSelect += '<option value="Munshiganj">মুন্সিগঞ্জ</option>';
        districtSelect += '<option value="Mymensingh">ময়মনসিংহ</option>';
        districtSelect += '<option value="Narail">নড়াইল</option>';
        districtSelect += '<option value="Narsingdi">নরসিংদী</option>';
        districtSelect += '<option value="Netrokona">নেত্রকোনা</option>';
        districtSelect += '<option value="Shariatpur">শরীয়তপুর</option>';
        districtSelect += '<option value="Tangail">টাঙ্গাইল</option>';        
    } 

    else if (divisionId === "Chattogram") { // Chattogram
        districtSelect += '<option value="Bandarban">বান্দরবান</option>';
        districtSelect += '<option value="Bhola">ভোলা</option>';
        districtSelect += '<option value="Bagerhat">বাগেরহাট</option>';
        districtSelect += '<option value="Chattogram">চট্টগ্রাম</option>';
        districtSelect += '<option value="Chuadanga">চুয়াডাঙ্গা</option>';
        districtSelect += '<option value="Comilla">কুমিল্লা</option>';
        districtSelect += '<option value="Cox\'s Bazar">কক্সবাজার</option>';
        districtSelect += '<option value="Feni">ফেনী</option>';
        districtSelect += '<option value="Khagrachari">খাগড়াছড়ি</option>';
        districtSelect += '<option value="Lakshmipur">লক্ষ্মীপুর</option>';
        districtSelect += '<option value="Noakhali">নোয়াখালী</option>';
        districtSelect += '<option value="Rangamati">রাঙ্গামাটি</option>';
    } 

    else if (divisionId === "Rajshahi") { // Rajshahi
        districtSelect += '<option value="Rajshahi">রাজশাহী</option>';
        districtSelect += '<option value="Natore">নাটোর</option>';
        districtSelect += '<option value="Pabna">পাবনা</option>';
        districtSelect += '<option value="Naogaon">নওগাঁ</option>';
        districtSelect += '<option value="Bogura">বগুড়া</option>';
        districtSelect += '<option value="Sirajganj">সিরাজগঞ্জ</option>';
        districtSelect += '<option value="Joypurhat">জয়পুরহাট</option>';
        districtSelect += '<option value="Chapainawabganj">চাপাইনবাবগঞ্জ</option>';
        districtSelect += '<option value="Rajbari">রাজবাড়ী</option>';
    } 

    else if (divisionId === "Khulna") { // Khulna
        districtSelect += '<option value="Bagerhat">বাগেরহাট</option>';
        districtSelect += '<option value="Chuadanga">চুয়াডাঙ্গা</option>';
        districtSelect += '<option value="Jessore">যশোর</option>';
        districtSelect += '<option value="Jhenaidah">ঝিনাইদাহ</option>';
        districtSelect += '<option value="Khulna">খুলনা</option>';
        districtSelect += '<option value="Kushtia">কুষ্টিয়া</option>';
        districtSelect += '<option value="Meherpur">মেহেরপুর</option>';
        districtSelect += '<option value="Satkhira">সাতক্ষীরা</option>';
    } 

    else if (divisionId === "Sylhet") { // Sylhet
        districtSelect += '<option value="Habiganj">হবিগঞ্জ</option>';
        districtSelect += '<option value="Moulvibazar">মৌলভীবাজার</option>';
        districtSelect += '<option value="Sunamganj">সুনামগঞ্জ</option>';
        districtSelect += '<option value="Sylhet">সিলেট</option>';
    } 

    else if (divisionId === "Barishal") { // Barishal
        districtSelect += '<option value="Barisal">বরিশাল</option>';
        districtSelect += '<option value="Bhola">ভোলা</option>';
        districtSelect += '<option value="Jhalokathi">ঝালকাঠী</option>';
        districtSelect += '<option value="Patuakhali">পটুয়াখালী</option>';
        districtSelect += '<option value="Pirojpur">পিরোজপুর</option>';
    } 
    else if (divisionId === "Rangpur") { // Rangpur
        districtSelect += '<option value="Gaibandha">গাইবান্ধা</option>';
        districtSelect += '<option value="Kurigram">কুড়িগ্রাম</option>';
        districtSelect += '<option value="Lalmonirhat">লালমনিরহাট</option>';
        districtSelect += '<option value="Nilphamari">নীলফামারী</option>';
        districtSelect += '<option value="Panchagarh">পঞ্চগড়</option>';
        districtSelect += '<option value="Rangpur">রংপুর</option>';
        districtSelect += '<option value="Thakurgaon">ঠাকুরগাঁও</option>';
    } 
    else if (divisionId === "Mymensingh") { // Mymensingh
        districtSelect += '<option value="Jamalpur">জামালপুর</option>';
        districtSelect += '<option value="Mymensingh">ময়মনসিংহ</option>';
        districtSelect += '<option value="Netrokona">নেত্রকোনা</option>';
        districtSelect += '<option value="Sherpur">শেরপুর</option>';
    } 
    document.getElementById("district").innerHTML = districtSelect;
}
