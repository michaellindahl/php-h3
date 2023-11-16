package main

import (
	"fmt"
	"os"
	"strconv"
	"github.com/uber/h3-go/v4"
)

func latLngToCell(latitude float64, longitude float64, resolution int) (string, error) {
	// Create a LatLng object
	latLng := h3.LatLng{
		Lat: latitude,
		Lng: longitude,
	}

	// Convert LatLng to H3 cell
	cell := h3.LatLngToCell(latLng, resolution)

	if cell.IsValid() {
		return cell.String(), nil
	}

	return "", fmt.Errorf("Invalid H3 cell for the given coordinates")
}

func main() {
	// Check command-line arguments
	if len(os.Args) != 4 {
		fmt.Println("Error Usage: latLngToCell <latitude> <longitude> <resolution>")
		os.Exit(1)
	}

	// Parse command-line arguments
	latitude, err := strconv.ParseFloat(os.Args[1], 64)
	if err != nil {
		fmt.Println("Error parsing latitude:", err)
		os.Exit(1)
	}

	longitude, err := strconv.ParseFloat(os.Args[2], 64)
	if err != nil {
		fmt.Println("Error parsing longitude:", err)
		os.Exit(1)
	}

	resolution, err := strconv.Atoi(os.Args[3])
	if err != nil {
		fmt.Println("Error parsing resolution:", err)
		os.Exit(1)
	}

	// Call LatLngToCell function
	cell, err := latLngToCell(latitude, longitude, resolution)
	if err != nil {
		fmt.Println("Error:", err)
		os.Exit(1)
	}

	fmt.Print(cell)
}
