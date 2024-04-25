<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LegalController extends Controller
{
    public function legal() {
        return view('mention-legale', [
            'title' => 'Mention légales',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum itaque nulla perspiciatis reiciendis ex officiis sapiente corporis omnis temporibus neque, qui maxime, iure quas explicabo. Ab sed veritatis odit expedita incidunt eveniet odio adipisci debitis eius sapiente corrupti et, quisquam excepturi asperiores ullam ut? Quis maiores cupiditate minima numquam. Deserunt, dolore. Ad omnis consectetur asperiores modi natus esse odio quae magni! Esse adipisci consequatur modi sint non doloremque dicta ullam officiis, natus culpa possimus quae molestias est ut? Illum ut earum laboriosam suscipit minus error, et, totam recusandae esse, nulla quam quae optio animi? Nesciunt quos, recusandae laboriosam aliquam qui et placeat, magni quo totam quia sapiente quibusdam modi, reiciendis nam eum sit. Optio tenetur necessitatibus corporis itaque velit veritatis laborum suscipit quidem, nam ad et vel! Hic facere possimus error beatae. Laboriosam soluta a neque eveniet dicta ea! Cumque vero blanditiis molestiae est, eaque culpa minima quas delectus aliquam!',
        ]);
    }
}
