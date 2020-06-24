<?php

namespace MichaelLindahl\H3;

class H3
{
    const H3IndexTypeDef = "typedef uint64_t H3Index;\n";

    const GeoCoordTypeDef = "typedef struct {
        /// latitude in radians
        double lat;  
        /// longitude in radians
        double lon;  
     } GeoCoord;\n";

    use IndexingTrait;
    use IndexInspectionTrait;
    use GridTraversalTrait;
    use HierarchicalGridTrait;
    use RegionTrait;
    use UnidirectionalEdgeTrait;
    use MiscTrait;
}
