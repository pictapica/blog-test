<?php

function datefr($date)
    {
        return strftime("%d %m %Y", strtotime($date));
    }