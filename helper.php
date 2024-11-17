<?php

/**
 * Get the base Path of the site
 *
 * @param string $path
 * @return string
 */

function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}

/**
 * Load a view
 * @param string $name
 * @param array $data
 * @return void
 */
function loadView($name, $data = [])
{
    $viewPath = basePath("app/views/$name.view.php");
    if (file_exists($viewPath)) {
        // extract the data array
        extract($data);
        require $viewPath;
    } else {
        echo "View $name not found";
    }
}

/**
 * Load a partial view
 * @param string $name
 * @return void
 */
function loadPartialView($name)
{
    $partialPath = basePath("app/views/partials/$name.php");
    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial View $name not found";
    }
}

/**
 * Inspect a value(s)
 * @param mixed $value
 * @return void
 */

function inspect($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}

/**
 * Inspect a value(s) and die
 * @param mixed $value
 * @return void
 */

function inspectAndDie($value)
{
    echo "<pre>";
    die(print_r($value, true));


}


/**
 * format salary
 * @param string $salary
 * @return string formatted salary
 */

function formatSalary($salary)
{
    return "$" . number_format(floatval($salary), 2);
}


/**
 * sanitize the data
 * @param $dirty
 * @return string
 */

function sanitize($dirty)
{
    // First trim whitespace
    $cleaned = trim($dirty);

    // Convert special characters to HTML entities
    $cleaned = htmlspecialchars($cleaned, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    // Additional sanitization using filter_var
    return filter_var($cleaned, FILTER_SANITIZE_SPECIAL_CHARS);
}

/**
 * Redirect to a given url
 * @param string $path
 * @return void
 */

function redirect($path)
{
    header("Location: $path");
    exit;
}
