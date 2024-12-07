<?php
(new App\Todo())->delete($todoId);
redirect('/todos');
