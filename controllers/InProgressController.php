<?php
(new App\Todo())->inProgress($todoId);
redirect('/todos');