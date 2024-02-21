<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class WordCloudController extends Controller
{
    public function generatePositiveWordCloud(Request $request)
    {
        $process = new Process(['ls', '-lsa']);
        $process->run();

        // executes after the command finishes
        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        echo $process->getOutput();
        return response()->json([
            'success' => true,
            'data' => $process->getOutput(),
        ]);
        // return $request->all();
    }

    public function generateNegativeWordCloud(Request $request)
    {

    }
}
