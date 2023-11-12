#define FFI_SCOPE "H3"
#define FFI_LIB "libh3.dylib"

// Where is H3 Library?
// When installed via Brew on macOS:
// ./usr/local/lib/libh3.dylib
// ./usr/local/lib/libh3.1.dylib
// ./usr/local/Cellar/h3/3.7.1/lib/libh3.dylib
// ./usr/local/Cellar/h3/3.7.1/lib/libh3.1.dylib

// FFI_LIB uses the system include path, and cwd is NOT included in that by default.

// The header file may contain a #define statement for the FFI_LIB variable to specify the library it exposes. 
// If it is a system library only the file name is required, e.g.: #define FFI_LIB "libc.so.6". 
// If it is a custom library, a relative path is required, e.g.: #define FFI_LIB "./mylib.so".

typedef uint64_t H3Index;

typedef struct {
    /// latitude in radians
    double lat;  
    /// longitude in radians
    double lng;  
} LatLng;

typedef struct {
    int numVerts;                        ///< number of vertices
    LatLng verts[10];  ///< vertices in ccw order
} CellBoundary;

// IndexInspection

int getResolution(H3Index h);
int isValidCell(H3Index h);

// Indexing

H3Index latLngToCell(const LatLng *latLng, int res);
void cellToLatLng(H3Index h3, LatLng *latLng);
void cellToBoundary(H3Index h3, CellBoundary *gp);

// HierarchicalGrid

H3Index cellToParent(H3Index h, int parentRes);

// Misc

double degsToRads(double degrees);
double radsToDegs(double degrees);