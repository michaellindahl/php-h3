// cellToLatLng.go
package main

import (
	"fmt"
	"github.com/uber/h3-go/v4"
	"os"
)

func cellToBoundary(indexString string) h3.CellBoundary {
	// Parse H3 cell string
	index := h3.IndexFromString(indexString)

	cell := h3.Cell(index)

	// Convert H3 cell to LatLng coordinates
	boundary := h3.CellToBoundary(cell)

	return boundary
}

func main() {
	// Check command-line arguments
	if len(os.Args) != 2 {
		fmt.Println("Error: Usage: cellToLatLng <H3_cell>")
		os.Exit(1)
	}

	// Parse command-line argument
	cell := os.Args[1]

	boundary := cellToBoundary(cell)

	for _, latLng := range boundary {
		fmt.Printf("%.15f %.15f\n", latLng.Lat, latLng.Lng)
	}
}
