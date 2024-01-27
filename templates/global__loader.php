<?php
    $animation = 400;
?>
<div class="global__loader_wrapper">
    <div class="global__loader">
        <div class="global__loader__inner one"></div>
        <div class="global__loader__inner two"></div>
        <div class="global__loader__inner three"></div>
    </div>
</div>

<style>
    .global__loader_wrapper{
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 1;
        transition: opacity <?= $animation . "ms" ?> ease;
    }

    .global__loader {
        position: absolute;
        top: calc(50% - 32px);
        left: calc(50% - 32px);
        width: 64px;
        height: 64px;
        border-radius: 50%;
        perspective: 800px;
    }
  
    .global__loader__inner {
        position: absolute;
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        border-radius: 50%;  
    }
    
    .global__loader__inner.one {
        left: 0%;
        top: 0%;
        animation: rotate-one 1s linear infinite;
        border-bottom: 3px solid #EFEFFA;
    }
    
    .global__loader__inner.two {
        right: 0%;
        top: 0%;
        animation: rotate-two 1s linear infinite;
        border-right: 3px solid #EFEFFA;
    }
    
    .global__loader__inner.three {
        right: 0%;
        bottom: 0%;
        animation: rotate-three 1s linear infinite;
        border-top: 3px solid #EFEFFA;
    }
    
    @keyframes rotate-one {
        0% {
        transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
        }
        100% {
        transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
        }
    }
    
    @keyframes rotate-two {
        0% {
        transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
        }
        100% {
        transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
        }
    }
    
    @keyframes rotate-three {
        0% {
        transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
        }
        100% {
        transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
        }
    }
</style>

<script>
    window.addEventListener("load", () => {
        const loader = document.querySelector(".global__loader_wrapper");

        loader.style.opacity = 0;

        setTimeout(() => {
            loader.style.display = "none";
        }, <?= $animation ?>)
    })
</script>

<?php

?>