<?php

namespace MichaelLindahl\H3;

class H3
{
    // Traits for project organization.
    use IndexingTrait;
    use IndexInspectionTrait;
    use GridTraversalTrait;
    use HierarchicalGridTrait;
    use RegionTrait;
    use UnidirectionalEdgeTrait;

    private $binDirectory;

    public function __construct()
    {
        $architecture = php_uname('m');
        $os = php_uname('s');

        if ($architecture === 'x86_64' && $os === 'Darwin') {
            $this->binDirectory = __DIR__.'/../bin/darwin-amd64';
        } elseif ($architecture === 'x86_64' && $os === 'Linux') {
            $this->binDirectory = __DIR__.'/../bin/linux-amd64';
        } else {
            // fallback on linux and hope everything works.
            $this->binDirectory = __DIR__.'/../bin/linux-amd64';
        }
    }
}
