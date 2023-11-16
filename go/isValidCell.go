package main

import (
	"fmt"
	"github.com/uber/h3-go/v4"
	"os"
)

func isValidH3Index(indexString string) bool {
	// Create a Cell from the parsed H3 index
	index := h3.IndexFromString(indexString)

	cell := h3.Cell(index)

	// Check if the Cell is valid
	isValid := cell.IsValid()

	return isValid
}

func main() {
	// Check if the number of command-line arguments is correct
	if len(os.Args) != 2 {
		fmt.Printf("Usage: the index should be provided as a single string")
		os.Exit(1)
	}

	// Get the H3 index as a string from the command-line argument
	h3IndexString := os.Args[1]

	// Check if the H3 index is valid
	isValid := isValidH3Index(h3IndexString)

	// Print the result
	if isValid {
		fmt.Printf("valid")
	} else {
		fmt.Printf("invalid")
	}
}