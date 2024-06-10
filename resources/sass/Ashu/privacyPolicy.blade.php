@extends('front_website.layout.app')
@section('content')


<style>
    h2{
        margin: 20px 0;
        font-weight: 700;
    }
    
    p{
        font-size: 16px;
        margin: 5px 0 25px 0 ;
    }

    h4{
        font-weight: 600;
    }

    .anchore:hover{
        color: rgb(2,138,162);
    }

   .main-logo{
    width: 120px;
    margin: auto;
    margin-top: 20px;
}

.main-logo img{
       border-radius: 50%;
   }

   
</style>
<section>
    <div class="container">
        <div class="row">
            <div class="col">


            <div class="main-logo">
                <img src="{{url('front_website/images/Ashu Project White.jpg')}}" alt="artifyme">
            </div>
                


                <h2 class="main-head">ASHU AI - Privacy Policy </h2>  
               
                <p>We appreciate you selecting <b>ASHU AI</b> as your dependable AI-powered assistant. We are dedicated to maintaining the confidentiality of your personal data and maintaining your privacy. When you engage with our AI assistant, your data is protected according to the terms outlined in this Privacy Policy.</p>
                <h4>1. Information Collection</h4>
                <p><b>ASHU AI</b> collects personal information from users. just to log in.  You must register for an account with us or submit personal information you may have, like your name, email address, and password.</p>
                <h4>2. Data Usage</h4>
                <p>The purpose of <b>ASHU AI</b> is to help users through text- and voice-based communication. We don't keep or examine any information collected from these exchanges. After the chat is over, no information is kept on file by <b>ASHU AI</b>. Your conversations are handled in real-time.</p>
                <h4>3. Voice Assistance</h4>
                <p>When using <b>ASHU AI's</b> voice assistant feature, your voice commands are processed locally on your device. We do not store or transmit any voice recordings to our servers. Your privacy is our top priority, and we are committed to ensuring the confidentiality of your voice interactions.</p>
                <h4>4. Typing Assistance</h4>
                <p>For users who would rather communicate through text, <b>ASHU AI</b> also offers typing assistance. We handle your text inputs instantly; none of your written messages are saved or examined by us. We never trace or monitor your typing activity, and we always respect your privacy.</p>
                <h4>5. Data Security</h4>
                <p>We are serious about protecting your data. Strong security measures are put in place by <b>ASHU AI</b> to guard against unauthorized access, disclosure, change, or destruction of your personal data. Our technologies are built to guarantee your data's integrity and confidentiality at all times.</p>
               
                <h4>6. Updates to the Privacy Policy</h4>
                <p>This Privacy Policy may be updated from time to time to reflect modifications to our data practices or changes in the laws that apply. We encourage you to review this Privacy Policy periodically for any updates. Your continued use of <b>ASHU AI</b> constitutes acceptance of any revisions to this Privacy Policy.</p>
                
                <h4>7. Consent</h4>
                <p>By using <b>ASHU AI</b>, you consent to the collection and use of your data as described in this Privacy Policy. If you do not agree with any aspect of this Privacy Policy, please refrain from using <b>ASHU AI</b>.</p>
                <p>Thank you for trusting <b>ASHU AI</b> with your privacy. We are dedicated to providing you with a secure and reliable AI assistant experience. If you have any questions or concerns about <b>ASHU AI</b> Privacy Policy, please contact us at <a href="mailto:avbigbuddy@gmail.com" class="anchore">avbigbuddy@gmail.com</a> </p>
                
            
                
            </div>
        </div>
    </div>
</section>






@endsection