<header class="custom-header">
    <div class="container d-flex flex-column justify-content-center align-items-center h-100 text-center">
        <h2 class="text-white fw-bold" style=" font-family: 'Rubik Spray Paint', cursive;"><?= isset($table) ? $table : 'Default Title' ?></h2>
        <?php if (!empty($description)) : ?>
            <p class="text-white opacity-75 fs-5"><?= $description ?></p>
        <?php endif; ?>
    </div>
</header>


<style>
    :root {
        --brown-main: #8B5E3C; 
        --brown-light: #D2B48C; 
    }

    .custom-header {
    height: 300px;
    background: url('https://images.pexels.com/photos/52724/coffee-beans-coffee-the-drink-caffeine-52724.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load') center/cover no-repeat;
    position: relative;
    color: white;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #989494;
    background-blend-mode: multiply;
}
.custom-header::before {
    content: "";
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.2); 
}



    .custom-header h2 {
        font-size: 2.5rem;
        font-weight: bold;
        text-transform: capitalize;
    }

    .custom-header p {
        font-size: 1.3rem;
        max-width: 600px;
    }
</style>
