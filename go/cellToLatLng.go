// cellToLatLng.go
package main

import (
	"fmt"
	"github.com/uber/h3-go/v4"
	"os"
)

func cellToLatLng(indexString string) h3.LatLng {
	// Parse H3 cell string
	index := h3.IndexFromString(indexString)

	cell := h3.Cell(index)

	// Convert H3 cell to LatLng coordinates
	latLng := h3.CellToLatLng(cell)

	return latLng
}

func main() {
	// Check command-line arguments
	if len(os.Args) != 2 {
		fmt.Println("Error: Usage: cellToLatLng <H3_cell>")
		os.Exit(1)
	}

	// Parse command-line argument
	cell := os.Args[1]

	// Call CellToLatLng function
	latLng := cellToLatLng(cell)

	fmt.Printf("%.15f %.15f", latLng.Lat, latLng.Lng)
}
