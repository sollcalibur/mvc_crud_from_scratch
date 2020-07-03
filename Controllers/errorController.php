<?php

class ErrorController extends Controller
{
    function pageNotFound()
    {
        $this->render("pageNotFound");
    }

    function unauthorized()
    {
    }
}
