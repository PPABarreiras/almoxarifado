<aside>
    <div class="content-aside">
        <div class="navigation">
            <div class="menu-toggle"></div>
            <ul class="list">
                <li class="list-item">
                    <a href="/final_php/View/Pages/Admin/homeAdmin.php">
                        <span class="icon">
                            <img class="iconHome" src="/final_php/assets/images/iconHome.png" alt="">
                        </span>

                        <div class="tooltip">
                            <span class="text">Home</span>
                            <span class="tooltiptext">Home</span>
                        </div>
                    </a>
                </li>
                <li class="list-item">
                    <a href="/final_php/View/Pages/Admin/estoque.php">
                        <span class="icon">
                            <img class="iconInventory" src="/final_php/assets/images/iconInventory.png" alt="">
                        </span>
                        <div class="tooltip">
                            <span class="text">Estoque</span>
                            <span class="tooltiptext">Estoque</span>
                        </div>
                    </a>
                </li>
                <li class="list-item">
                    <a href="/final_php/View/Pages/Admin/cadastro.php">
                        <span class="icon">
                            <img class="iconInventory" src="/final_php/assets/images/iconRegister.png" alt="">
                        </span>

                        <div class="tooltip">
                            <span class="text">Cadastros</span>
                            <span class="tooltiptext">Cadastros</span>
                        </div>
                    </a>
                </li>
                <li class="list-item">
                    <a href="/final_php/View/Pages/Admin/listas.php">
                        <span class="icon">
                            <img class="iconInventory" src="/final_php/assets/images/iconList.png" alt="">
                        </span>

                        <div class="tooltip">
                            <span class="text">Listas</span>
                            <span class="tooltiptext">Listas</span>
                        </div>

                    </a>
                </li>

                <li class="list-item">
                    <a href="/final_php/View/Pages/Admin/requisicoes.php">
                        <span class="icon">
                            <img class="iconInventory" src="/final_php/assets/images/iconRequirements.png" alt="">
                        </span>
                        <div class="tooltip">
                            <span class="text">Requisições</span>
                            <span class="tooltiptext">Requisições</span>
                        </div>
                    </a>
                </li>
                <li class="list-item">
                    <a href="/final_php/index.html">
                        <span class="icon">
                            <img class="iconInventory" src="/final_php/assets/images/iconLogout.png" alt="">
                        </span>
                        <span class="text">Sair</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
</aside>

<script>
const menuToggle = document.querySelector('.menu-toggle');
const navigation = document.querySelector('.navigation');
menuToggle.onclick = () => {
    navigation.classList.toggle('open');
}

const listItems = document.querySelectorAll('.list-item');
listItems.forEach(item => {
    item.onclick = () => {
        listItems.forEach(item => item.classList.remove('active'));
        item.classList.add('active');
    }
})
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.content-aside {
    width: 100%;
    min-height: 100vh;
    background: #3d4152;
}

.navigation {
    width: 75px;
    min-height: 565px;
    background: #fff;
    transition: 0.5s;
    display: flex;
    justify-content: center;
    align-items: center;
}

.navigation.open {
    width: 200px;
}

.navigation .menu-toggle {
    position: absolute;
    top: 0;
    left: 0;
    width: 5rem;
    height: 60px;
    cursor: pointer;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding: 0 20px;
}

.navigation .menu-toggle::before {
    content: '';
    position: absolute;
    width: 30px;
    height: 2px;
    background: #333;
    transform: translateY(-8px);
    transition: 0.5s;
}

.navigation.open .menu-toggle::before {
    transform: translateY(0) rotate(45deg);
}

.navigation .menu-toggle::after {
    content: '';
    position: absolute;
    width: 30px;
    height: 2px;
    background: #333;
    transform: translateY(8px);
    transition: 0.5s;
    box-shadow: 0 -8px 0 #333;
}

.navigation.open .menu-toggle::after {
    transform: translateY(0) rotate(-45deg);
    box-shadow: none;
}

.navigation ul {
    display: flex;
    flex-direction: column;
    /* gap: 10px; */
    width: 100%;
}


.navigation ul li {
    list-style: none;
    padding: 0 10px;
    cursor: pointer;
    transition: 0.5s;
}

.navigation ul li a {
    text-decoration: none;
    /* position: relative; */
    display: flex;
    justify-content: flex-start;
    /* text-align: center; */
    align-items: center;
}

.navigation ul li a .icon {
    position: relative;
    display: block;
    min-width: 55px;
    height: 55px;
    line-height: 60px;
    color: #222;
    border-radius: 10px;
    font-size: 1.75em;
    transition: 0.5s;
}

.navigation ul li.active a .icon {
    color: #fff;
    background: var(--color);
}

.navigation ul li a .icon::before {
    content: '';
    position: absolute;
    top: 10px;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 10px;
    background: var(--color);
    filter: blur(8px);
    opacity: 0;
    transition: 0.5s;
}

.navigation ul li.active a .icon::before {
    opacity: 0.5;
}

.navigation ul li a .text {
    position: relative;
    padding: 0 15px;
    height: 60px;
    display: flex;
    align-items: center;
    color: #333;
    opacity: 0;
    visibility: hidden;
    transition: 0.5s;
}

.navigation.open ul li a .text {
    opacity: 1;
    visibility: visible;
}

.navigation ul li.active a .text {
    color: var(--color);
}

.iconInventory {
    width: 35px;
    height: 35px;
}

.tooltip {
    position: relative;
    display: inline-block;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>