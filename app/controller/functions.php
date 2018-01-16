<?php

function datefr($date) {
   return strftime("%d/%m/%Y à %Hh%M", strtotime($date));
}
