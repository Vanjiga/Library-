<main style="width: 70%; margin: 0 auto;">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Welcome to online library</h1>
            <p class="col-md-8 fs-4">
    Accelerating research discovery to shape a better future.Today's research, tomorrow's innovation  </p>
            <button class="btn btn-primary btn-lg" type="button">Have a look at staff pick</button>
        </div>
        </div>

        <div class="p-5 mb-4 bg rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold"></h1>
            <p class="col-md-8 fs-4">
    </p>
            
        </div>
        </div>

        <div class="row align-items-md-stretch">
      <div class="col-md-6 gy-5">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
          <h2>Explore our world</h2>
          <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
          <button class="btn btn-outline-light" type="button">Example button</button>
        </div>
      </div>
        <?php foreach($staffPicks as $staffPick) : ?>
            <div class="col-md-6 gy-5">
                <div class="h-100 p-5 bg-white border rounded-3">
                <h2><?php echo $staffPick['title'] ?></h2>
                <h5>Genre "<?php echo $staffPick['category_name']?>"</h5>
                <h6>Written by <?php echo $staffPick['author_name'] ?></h6>
                <h6>Added to Online <?php echo $staffPick['added_date'] ?></h6>
                <p><?php echo $staffPick['book_info'] ?></p>
                <button class="btn btn-outline-secondary" type="button">Add to library</button>
                </div>
            </div>
      <?php endforeach ?>
      <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2021
    </footer>
<main>
