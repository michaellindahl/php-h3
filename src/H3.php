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
    use MiscTrait;

    // Shared C declarations.
    protected const H3IndexTypeDef = "typedef uint64_t H3Index;\n";
    protected const H3ErrorTypeDef = "typedef uint64_t H3Error;\n";
    protected const LatLngTypeDef = "typedef struct {
        /// latitude in radians
        double lat;  
        /// longitude in radians
        double lng;  
     } LatLng;\n";

     protected const CellBoundaryTypeDef = "typedef struct {
        /// number of vertices
        int numVerts;  
        /// vertices in ccw order
        LatLng verts[10];
     } CellBoundary;\n";

    /// The dylib shared library name. In my experience this is used on Vapor and macOS.
    public const DYLIB = '/usr/local/lib/libh3.dylib';

    /// The so shared library name. In my experience this is used on Ubuntu.
    public const SO = 'libh3.so';

    /// The name of a shared library file, to be loaded and linked with the definitions.
    protected string $lib;

    /// Public constructor for creating an instance of H3.
    public function __construct(string $lib)
    {
        $this->lib = $lib;
    }
}
