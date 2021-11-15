<?php

namespace App\Console\Commands;

trait ResourceTrait {
    public function confirmOverwrite($file)
    {
        if ( ! file_exists($file) || $this->confirm('<comment>' . basename($file) . '</comment> already exists! Overwrite this file? [y|N]')) {
            return true;
        }

        return false;
    }

    public function createPhpFile($file, $content)
    {
        file_put_contents($file, '<?php' . "\n\n" . $content);
    }

    public function createViewFile($file, $content)
    {
        file_put_contents($file, $content);
    }

    public function routeName()
    {
        return str_replace('_', '-', $this->table);
    }

    public function tableTitleCase()
    {
        $string = mb_convert_case(str_replace('_', ' ', $this->table), MB_CASE_TITLE, 'UTF-8');
        $string = str_replace(' ', '', $string);

        return $string;
    }

    public function routesCommentHandle()
    {
        return '/* GENERATED ROUTES */';
    }

    public function generateNav()
    {
        $namespace = strtolower($this->namespace);
        $nav = "<li @if(Tools::routeIs('painel.{$this->routeName()}*')) class=\"active\" @endif>\n\t\t<a href=\"{{ route('{$namespace}.{$this->routeName()}.index') }}\">{$this->resourceName}</a>\n\t</li>";
        $navFile = base_path('resources/views/' . $namespace . '/common/nav.blade.php');
        $navFileContents = file_get_contents($navFile);

        if (strpos($navFileContents, $nav)) {
            $this->info('Navigation link already exists.');
            return false;
        }

        $navHandle = '/(<ul class="nav navbar-nav">)/';
        if (preg_match($navHandle, $navFileContents)) {
            $data = preg_replace($navHandle, "$1\n\t{$nav}", $navFileContents);
            file_put_contents($navFile, $data);
            $this->info('Navigation link for <comment>'.$this->routeName().'</comment> added successfully.');
        } else {
            $this->error('Navigation link could not be added.');
        }
    }
}
