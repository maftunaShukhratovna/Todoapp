<?php
(new App\Todo())->pending($todoId);
redirect('/todos');
