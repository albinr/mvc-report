<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerMxZuXKO\App_KernelTestDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerMxZuXKO/App_KernelTestDebugContainer.php') {
    touch(__DIR__.'/ContainerMxZuXKO.legacy');

    return;
}

if (!\class_exists(App_KernelTestDebugContainer::class, false)) {
    \class_alias(\ContainerMxZuXKO\App_KernelTestDebugContainer::class, App_KernelTestDebugContainer::class, false);
}

return new \ContainerMxZuXKO\App_KernelTestDebugContainer([
    'container.build_hash' => 'MxZuXKO',
    'container.build_id' => '28cc75b7',
    'container.build_time' => 1715960881,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerMxZuXKO');
