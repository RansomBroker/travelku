<style>
    .imgWrapper {
        border: 2px solid #ddd;
        border-radius: 50%;
        padding: 10px;
        width: 70px;
        height: 70px;
        align-items: center;
        justify-content: center;
    }

    .contentWrapper {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .contentWrapper p {
        font-size: 18px;
     
    }

    @media (max-width: 1024px) {
        .imgWrapper {
            width: 50px;
            height: 50px;
        }

        .contentWrapper p {
            font-size: 10px;
            white-space: nowrap;
            
        }
    }
</style>
<div class="row wrapperPpob">
    <div class="col-3 contentWrapper">
        <div class="imgWrapper">
            <img src="{{ asset('assets/icons/brizzi.png') }}" alt="" width="100%" height="100%">
        </div>
        <p>Brizzi</p>
    </div>
    <div class="col-3 contentWrapper">
        <div class="imgWrapper">
            <img src="{{ asset('assets/icons/VectorBNI.png') }}" alt="" width="100%" height="100%">
        </div>
        <p>Tapcash BNI</p>
    </div>
    <div class="col-3 contentWrapper">
        <div class="imgWrapper">
            <img src="{{ asset('assets/icons/e-money_Qg61SKC.png') }}" alt="" width="100%" height="100%">
        </div>
        <p>e-Money</p>
    </div>
    <div class="col-3 contentWrapper">
        <div class="imgWrapper">
            <img src="{{ asset('assets/icons/link-aja-01_996Qdib.png') }}" alt="" width="100%" height="100%">
        </div>
        <p>Link Aja</p>
    </div>
</div>

<div class="row wrapperPpob">
    <div class="col-3 contentWrapper">
        <div class="imgWrapper">
            <img src="{{ asset('assets/icons/shopeepay-40px_DPxfePD.png') }}" alt="" width="100%" height="100%">
        </div>
        <p>ShopeePay</p>
    </div>
    <div class="col-3 contentWrapper">
        <div class="imgWrapper">
            <img src="{{ asset('assets/icons/logo_DANA.png') }}" alt="" width="100%" height="100%">
        </div>
        <p>Dana</p>
    </div>
    <div class="col-3 contentWrapper">
        <div class="imgWrapper">
            <img src="{{ asset('assets/icons/icon-gopay.png') }}" alt="" width="100%" height="100%">
        </div>
        <p>Go-Pay</p>
    </div>
    <div class="col-3 contentWrapper">
        <div class="imgWrapper">
            <img src="{{ asset('assets/icons/icon-ovo.png') }}" alt="" width="100%" height="100%">
        </div>
        <p>Ovo</p>
    </div>
</div>
