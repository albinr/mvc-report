<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerGBhqzGv\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerGBhqzGv/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerGBhqzGv.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerGBhqzGv\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerGBhqzGv\App_KernelDevDebugContainer([
    'container.build_hash' => 'GBhqzGv',
    'container.build_id' => '04d2cffa',
    'container.build_time' => 1724262847,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerGBhqzGv');
