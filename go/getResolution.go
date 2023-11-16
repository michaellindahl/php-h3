package main

import (
	"fmt"
	"github.com/uber/h3-go/v4"
	"os"
)

func getResolution(indexString string) int {
	// Create a Cell from the parsed H3 index
	index := h3.IndexFromString(indexString)

	cell := h3.Cell(index)

	// Check if the Cell is valid
	if !cell.IsValid() {
		return -1
	}

	return cell.Resolution()
}

func main() {
	// Check if the number of command-line arguments is correct
	if len(os.Args) != 2 {
		fmt.Printf("Usage: the index should be provided as a single string")
		os.Exit(1)
	}

	// Get the H3 index as a string from the command-line argument
	h3IndexString := os.Args[1]

	fmt.Printf("%d", getResolution(h3IndexString))
}